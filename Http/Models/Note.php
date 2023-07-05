<?php

namespace Http\Models;

use Core\Database;
use Core\App;
use Core\Container;


class Note {
	protected $db;

	public function __construct() {
		$this->db = App::getContainer()->resolve(Database::class);
	}

	public function create($body, $title = 'Hardcoded title', $user_id = 1) {
		$this->db->query('INSERT INTO notes(body, title, user_id) VALUES(:body, :title, :user_id)', [
			'body' => $body,
			'title' => $title,
			'user_id' => $user_id
		]);
	}

	public function delete($id, $user_id = 1) {
		$note = $this->db->query('select * from notes where id = ?', [$id])->findOrFail();

		authorize($note['user_id'] === $user_id);

		$this->db->query('delete from notes where id = :id', [
			'id' => $id]);
	}

	public function show($id, $user_id = 1) {
		$note = $this->db->query('select * from notes where id = ?', [$id])->findOrFail();

		authorize($note['user_id'] === $user_id);

		return $note;
	}

	public function update($id, $body, $user_id = 1) {
		$note = $this->db->query('select * from notes where id = ?', [$id])->findOrFail();

		authorize($note['user_id'] === $user_id);

		$this->db->query('update notes set body = :body where id = :id', [
			'body' => $body,
			'id' => $id
		]);
	}

	public function all($user_id = 1) {
		return $this->db->query('select * from notes where user_id = :user_id', ['user_id' => $user_id])->findAll();
	}
}	