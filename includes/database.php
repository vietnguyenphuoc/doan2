<?php
if (!defined('_CODE')) {
    die('Access denied...');
}

function query($sql, $data = []){
    global $conn;
    $result = false;
    try {
        $stmt = $conn->prepare($sql);
        if (empty($data)) {
            $result = $stmt->execute();
        }else{
            $result = $stmt->execute($data);
        }
        echo 'thanh cong';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    return $result;
}

function insert($table, $data) {
    $key = array_keys($data);
    $datafields = implode(', ',$key);
    $values = ':'.implode(', :',$key);
    $sql = "INSERT INTO $table ($datafields) VALUES ($values)";
    query($sql,$data);
}

function update($table, $data, $condition = []) {
    // Tạo phần SET cho SQL bằng cách duyệt mảng dữ liệu
    $setPart = [];
    foreach ($data as $key => $value) {
        $setPart[] = "$key = :$key";
    }
    $setQuery = implode(', ', $setPart);

    // Nếu có điều kiện WHERE 
    $whereQuery = '';
    $combinedData = $data;

    if (!empty($condition)) {
        $wherePart = [];
        foreach ($condition as $key => $value) {
            $wherePart[] = "$key = :where_$key";
        }
        $whereQuery = ' WHERE ' . implode(' AND ', $wherePart);

        // Gộp dữ liệu cập nhật và dữ liệu điều kiện vào một mảng
        $combinedData = array_merge($data, array_combine( 
            array_map(function($key) { return "where_$key"; }, array_keys($condition)),
            array_values($condition)
        ));
    }

    // Tạo câu SQL UPDATE
    $sql = "UPDATE $table SET $setQuery $whereQuery";

    // Thực thi truy vấn
    return query($sql, $combinedData);
}

