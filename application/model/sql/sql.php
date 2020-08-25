<?php 

class Sql
{   protected $conn;
    protected $_dbHandle;
    protected $_result;
    private $filter = '';
    public $_table;

    // 連線資料庫
    protected function connect($host, $username, $password, $dbname)
    {
	$conn = mysqli_connect( $host, $username, $password );
if( !$conn ) {
	echo "<script> console.log('MySQL 連線失敗') </script>";
	return;
}
//	echo "<script> console.log('MySQL 連線成功') </script>";

if(!$db = mysqli_select_db($conn, $dbname))
    echo "DB name error!!!";
    $this->conn = $conn;
	return $conn;
    }

    protected function disconnect() 
    {

        if(mysqli_close($this->conn))
//	 echo "<script> console.log('DBCLOSE Success!!') </script>";
        return 0;
    }


    // 查詢條件
    protected function where($where = array())
    {
        if (isset($where)) {
            $this->filter .= ' WHERE ';
            $this->filter .=$where;
        }

        return $this;
    }

    // 排序條件
    protected function order($order = array())
    {
        if(isset($order)) {
            $this->filter .= ' ORDER BY ';
            $this->filter .= implode(',', $order);
        }

        return $this;
    }

    // 查詢所有
    protected function selectAll($colon)
    {
        $sql = sprintf("select %s from `%s` %s", $colon, $this->_table, $this->filter);
        $data = $this->query($sql);
        

        return $data;
    }

    // 根據條件 查詢
    protected function select($colonSelect, $colon, $id)
    {
        $sql = sprintf("select %s from `%s` where `%s` = '%s'", $colonSelect, $this->_table,$colon, $id);
      
        $data = $this->query($sql);


        return $data;
    }

    // 根據欄位條件刪除
    protected function delete($colon, $id)
    {
        $sql = sprintf("delete from `%s` where `%s` = '%s'", $this->_table, $colon, $id);
        $data = $this->prepare($sql);

        return $data;
    }

    // 自定義SQL查詢，返回影響的行數
    protected function query($sql)
    {
        $data = $this->prepare($sql);

        return $data;
    }

    // 新增資料
    protected function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));

        return $this->query($sql);
    }

    // 修改資料
    protected function update($id, $data)
    {
        $sql = sprintf("update `%s` set %s where `id` = '%s'", $this->_table, $this->formatUpdate($data), $id);

        return $this->query($sql);
    }

    // 將陣列轉換成插入格式的sql語句
    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }

        $field = implode(',', $fields);
        $value = implode(',', $values);

        return sprintf("(%s) values (%s)", $field, $value);
    }

    // 將陣列轉換成更新格式的sql語句
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = '%s'", $key, $value);
        }

        return implode(',', $fields);
    }

    private function prepare($sql) {

        mysqli_query($this->conn,'set_names_utf8');
        $query = mysqli_query($this->conn,$sql);
       $rol_num = mysqli_num_rows($query);

        for($num = 0;$num < $rol_num;$num++ ) {
            $result[$num] = mysqli_fetch_row($query);
        
         }

        return $result;
    }
}