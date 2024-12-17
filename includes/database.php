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

function delete($table, $condition=''){
    $sql = '';
    if (!empty($condition)) {
        $sql = "DELETE FROM $table WHERE $condition";
    }else{
        $sql = "DELETE FROM $table WHERE";
    }
    return query($sql);
}

function select($table, $columns = '*', $condition = []) {
    global $conn;

    // Xử lý các cột cần chọn
    if (is_array($columns)) {
        $columns = implode(', ', $columns);
    }

    // Xử lý điều kiện WHERE nếu có
    $whereQuery = '';
    $data = [];
    if (!empty($condition)) {
        $wherePart = [];
        foreach ($condition as $key => $value) {
            $wherePart[] = "$key = :$key";
            $data[$key] = $value;
        }
        $whereQuery = ' WHERE ' . implode(' AND ', $wherePart);
    }

    // Câu SQL SELECT
    $sql = "SELECT $columns FROM $table $whereQuery";

    // Thực thi truy vấn
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết quả
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
