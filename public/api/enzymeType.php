<?php
class EnzymeType extends API {

	public function get($id, $params) {
		try {
			if (empty($id)) {
				$qry = $this->db->prepare("SELECT * FROM EnzymeType ORDER BY Name ASC");
				$qry->setFetchMode(PDO::FETCH_ASSOC);
				$qry->execute(array());
				$res = $qry->fetchAll();
			} else {
				$qry = $this->db->prepare("SELECT * FROM EnzymeType WHERE ID = :ID");
				$qry->setFetchMode(PDO::FETCH_ASSOC);
				$qry->execute(array(":ID" => $id));
				$res = $qry->fetch();
			}
			echo json_encode($res, JSON_NUMERIC_CHECK);
		} catch (PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
	}
}