<?php
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    //title
    $title=["CDR_scoreChange_normal","id","HSEX","AGE","Edu","Memory","Orientation","Judgment and Problem Solving","Community Affairsl","Home and Hobbies","Personal Care","MMSE_Orientation","MMSE_time","MMSE_place","MMSE_Registration","MMSE_Attention and calculation","MMSE_Recall","MMSE_Language"];
    $len=count($title);
    for($i=1; $i<=$len; $i++){
        $sheet->setCellValueByColumnAndRow($i, 1, $title[$i-1]);
    }

    //內容
    $link=mysqli_connect("localhost","root","","subject");

    $row=2;
    $sql_y="SELECT p.id, c.cdr
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, cdr,
            ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr
    ) c ON p.id = c.id AND c.row_num <= 2
    UNION ALL
    SELECT p.id, NULL
    FROM patient_basic p
    WHERE NOT EXISTS (
        SELECT 1
        FROM cdr c
        WHERE p.id = c.id
    )
    ORDER BY id";
    $result_y=mysqli_query($link,$sql_y);
    $id_value = array();
    $cdr_value = array();

    while ($record_y=mysqli_fetch_array($result_y)) {
        if (!in_array($record_y['id'], $id_value)) {
            $id_value[] = $record_y['id'];
        }
        $cdr_value[$record_y['id']][] = $record_y['cdr'];
    }
    foreach ($id_value as $id) {
        if (count($cdr_value[$id]) == 1) {
            $cdr_value[$id][] = NULL;
            $sheet->setCellValueByColumnAndRow(1, $row, '999');
            $row++;
        }else{
            $CDR_scoreChange_normal = $cdr_value[$id][1] - $cdr_value[$id][0];
            if($CDR_scoreChange_normal > 0){
                $sheet->setCellValueByColumnAndRow(1, $row, 1);
                $row++;
            }else{
                $sheet->setCellValueByColumnAndRow(1, $row, 0);
                $row++;
            }
        }
    }

    $row = 2;
    $sql_id = "select id from patient_basic";
    $result_id = mysqli_query($link,$sql_id);
    while($record_id = mysqli_fetch_assoc($result_id)){
        if($record_id['id'] == ""){
            $sheet->setCellValueByColumnAndRow(2, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(2, $row, $record_id['id']);
            $row++;
        }
    }

    $row=2;
    $sql_basic="select * from patient_basic";
    $result_basic=mysqli_query($link,$sql_basic);
    while($record_basic = mysqli_fetch_assoc($result_basic)){
        if($record_basic['hsex'] == ""){
            $sheet->setCellValueByColumnAndRow(3, $row, '999');
            $row++;
        }else{
            if($record_basic['hsex'] == "男"){
                $sheet->setCellValueByColumnAndRow(3, $row, 'M');
                $row++;
            }else{
                $sheet->setCellValueByColumnAndRow(3, $row, 'F');
                $row++;
            }   
        }
    }

    $row=2;
    $sql_basic="select * from patient_basic";
    $result_basic=mysqli_query($link,$sql_basic);
    while($record_basic = mysqli_fetch_assoc($result_basic)){
        if($record_basic['age'] == ""){
            $sheet->setCellValueByColumnAndRow(4, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(4, $row, $record_basic['age']);
            $row++;
        }
    }

    $row=2;
    $sql_basic="select * from patient_basic";
    $result_basic=mysqli_query($link,$sql_basic);
    while($record_basic = mysqli_fetch_assoc($result_basic)){
        if($record_basic['education'] == "" or $record_basic['education'] == "其他"){
            $sheet->setCellValueByColumnAndRow(5, $row, '999');
            $row++;
        }else if($record_basic['education'] == "0*"){
            $sheet->setCellValueByColumnAndRow(5, $row, '0');
            $row++;
        }else if($record_basic['education'] == "6*"){
            $sheet->setCellValueByColumnAndRow(5, $row, '6');
            $row++;
        }else if($record_basic['education'] == "9*"){
            $sheet->setCellValueByColumnAndRow(5, $row, '9');
            $row++;
        }else if($record_basic['education'] == "12*"){
            $sheet->setCellValueByColumnAndRow(5, $row, '12');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(5, $row, $record_basic['education']);
            $row++;
        }
    }

    $row=2;
    $sql_memory="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_memory 
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_memory=mysqli_query($link, $sql_memory);
    while($record_memory = mysqli_fetch_assoc($result_memory)){
        if($record_memory['content'] == ""){
            $sheet->setCellValueByColumnAndRow(6, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(6, $row, $record_memory['content']);
            $row++;
        }      
    }

    $row=2;
    $sql_orientation="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_orientation
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_orientation=mysqli_query($link, $sql_orientation);
    while($record_orientation = mysqli_fetch_assoc($result_orientation)){
        if($record_orientation['content'] == ""){
            $sheet->setCellValueByColumnAndRow(7, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(7, $row, $record_orientation['content']);
            $row++;
        }
    }

    $row=2;
    $sql_judgment_and_problem_solving="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_judgment_and_problem_solving
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_judgment_and_problem_solving=mysqli_query($link, $sql_judgment_and_problem_solving);
    while($record_judgment_and_problem_solving = mysqli_fetch_assoc($result_judgment_and_problem_solving)){
        if($record_judgment_and_problem_solving['content'] == ""){
            $sheet->setCellValueByColumnAndRow(8, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(8, $row, $record_judgment_and_problem_solving['content']);
            $row++;
        }
    }

    $row=2;
    $sql_community_affairs="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_community_affairs
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_community_affairs=mysqli_query($link, $sql_community_affairs);
    while($record_community_affairs = mysqli_fetch_assoc($result_community_affairs)){
        if($record_community_affairs['content'] == ""){
            $sheet->setCellValueByColumnAndRow(9, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(9, $row, $record_community_affairs['content']);
            $row++;
        }
    }

    $row=2;
    $sql_home_and_hobbies="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_home_and_hobbies
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_home_and_hobbies=mysqli_query($link, $sql_home_and_hobbies);
    while($record_home_and_hobbies = mysqli_fetch_assoc($result_home_and_hobbies)){
        if($record_home_and_hobbies['content'] == ""){
            $sheet->setCellValueByColumnAndRow(10, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(10, $row, $record_home_and_hobbies['content']);
            $row++;
        }
    }

    $row=2;
    $sql_personal_care="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM cdr_personal_care
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_personal_care=mysqli_query($link, $sql_personal_care);
    while($record_personal_care = mysqli_fetch_assoc($result_personal_care)){
        if($record_personal_care['content'] == ""){
            $sheet->setCellValueByColumnAndRow(11, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(11, $row, $record_personal_care['content']);
            $row++;
        }    
    }

    $row=2;
    $sql_time="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_time
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_time=mysqli_query($link, $sql_time);
    while($record_time = mysqli_fetch_assoc($result_time)){
        if($record_time['content'] == ""){
            $sheet->setCellValueByColumnAndRow(13, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(13, $row, $record_time['content']);
            $row++;
        }
    }

    $row=2;
    $sql_place="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_place
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_place=mysqli_query($link, $sql_place);
    while($record_place = mysqli_fetch_assoc($result_place)){
        if($record_place['content'] == ""){
            $sheet->setCellValueByColumnAndRow(14, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(14, $row, $record_place['content']);
            $row++;
        } 
    }

    $row=2;
    $sql_time="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_time
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_time=mysqli_query($link, $sql_time);

    $sql_place="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_place
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_place=mysqli_query($link, $sql_place);
    
    while (true) {
        $record_time = mysqli_fetch_assoc($result_time);
        if (!$record_time) {
            break;
        }
        
        $record_place = mysqli_fetch_assoc($result_place);
        if (!$record_place) {
            break;
        }
    
        $sum = intval($record_time['content']) + intval($record_place['content'] );
        $sum_str = strval($sum);
        if($record_time['content'] == "" || $record_place['content'] == ""){
            $sheet->setCellValueByColumnAndRow(12, $row, "999");
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(12, $row, $sum_str);
            $row++;
        }
    }

    $row=2;
    $sql_registration="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_registration
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_registration=mysqli_query($link, $sql_registration);
    while($record_registration = mysqli_fetch_assoc($result_registration)){
        if($record_registration['content'] == ""){
            $sheet->setCellValueByColumnAndRow(15, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(15, $row, $record_registration['content']);
            $row++;
        } 
    }
    
    $row=2;
    $sql_attention_and_calculation="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_attention_and_calculation
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_attention_and_calculation=mysqli_query($link, $sql_attention_and_calculation);
    while($record_attention_and_calculation = mysqli_fetch_assoc($result_attention_and_calculation)){
        if($record_attention_and_calculation['content'] == ""){
            $sheet->setCellValueByColumnAndRow(16, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(16, $row, $record_attention_and_calculation['content']);
            $row++;
        }
    }

    $row=2;
    $sql_recall="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_recall
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_recall=mysqli_query($link, $sql_recall);
    while($record_recall = mysqli_fetch_assoc($result_recall)){
        if($record_recall['content'] == ""){
            $sheet->setCellValueByColumnAndRow(17, $row, '999');
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(17, $row, $record_recall['content']);
            $row++;
        }   
    }

    $row=2;
    $sql_lan_name="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_lan_name
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_lan_name=mysqli_query($link, $sql_lan_name);

    $sql_lan_repeat="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_lan_repeat
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_lan_repeat=mysqli_query($link, $sql_lan_repeat);

    $sql_lan_read="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_lan_read
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_lan_read=mysqli_query($link, $sql_lan_read);

    $sql_lan_write="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_lan_write
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_lan_write=mysqli_query($link, $sql_lan_write);

    $sql_act="SELECT p.hsex, p.age, p.education ,c.content
    FROM patient_basic p
    LEFT JOIN (
        SELECT id, date, content,
               ROW_NUMBER() OVER (PARTITION BY id ORDER BY date DESC) AS row_num
        FROM mmse_action
    ) c ON p.id = c.id AND c.row_num = 2";
    $result_act=mysqli_query($link, $sql_act);

    while (true) {
        $record_lan_name = mysqli_fetch_assoc($result_lan_name);
        if (!$record_lan_name) {
            break;
        }
            
        $record_lan_repeat = mysqli_fetch_assoc($result_lan_repeat);
        if (!$record_lan_repeat) {
            break;
        }
    
        $record_lan_read = mysqli_fetch_assoc($result_lan_read);
        if (!$record_lan_read) {
            break;
        }
    
        $record_lan_write = mysqli_fetch_assoc($result_lan_write);
        if (!$record_lan_write) {
            break;
        }

        $record_act = mysqli_fetch_assoc($result_act);
        if (!$record_act) {
            break;
        }
    
        $sum = intval($record_lan_name['content']) + intval($record_lan_repeat['content'] + intval($record_lan_read['content']) + intval($record_lan_write['content']) + intval($record_act['content']));
        $sum_str = strval($sum);
        if($record_lan_name['content'] == "" || $record_lan_repeat['content'] == "" || $record_lan_read['content'] == "" || $record_lan_write['content'] == "" || $record_act['content'] ==""){
            $sheet->setCellValueByColumnAndRow(18, $row, "999");
            $row++;
        }else{
            $sheet->setCellValueByColumnAndRow(18, $row, $sum_str);
            $row++;
        }
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="data.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');   
?>