<?php
namespace CSY2028;
class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;

	public function __construct($pdo, $table, $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}

	public function find($field, $value) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function find2($field, $value,$field2,$value2) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value'. ' and ' . $field2 . ' = :value2');

		$criteria = [
			'value' => $value,
			'value2' => $value2
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}




	public function findAll() {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function insert($record) {
	        $keys = array_keys($record);

	        $values = implode(', ', $keys);
	        $valuesWithColon = implode(', :', $keys);

	        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

	        $stmt = $this->pdo->prepare($query);

	        $stmt->execute($record);
	}

	public function delete($id) {
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
		$criteria = [
			'id' => $id
		];
		$stmt->execute($criteria);
	}


	public function save($record) {
		try {
			$this->insert($record);
		}
		catch (\Exception $e) {
			$this->update($record);
		}
	}

	public function update($record) {

	         $query = 'UPDATE ' . $this->table . ' SET ';

	         $parameters = [];
	         foreach ($record as $key => $value) {
	                $parameters[] = $key . ' = :' .$key;
	         }

	         $query .= implode(', ', $parameters);
	         $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

	         $record['primaryKey'] = $record[$this->primaryKey];

	         $stmt = $this->pdo->prepare($query);

	         $stmt->execute($record);
	}

}
