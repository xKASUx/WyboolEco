<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\models;

use core\services\Connect;

class EventModel
{
    public $db;

    public function __construct()
    {
        $this->db = Connect::getInstanse(); // Инициализация подключения к базе данных
    }
		public function getEventsToMap() {
			$cards = $this->db->query("SELECT * FROM `events`");

			return json_encode($cards);
		}

		public function getEventsByUser($user_id) {
			return $this->db->query("SELECT * FROM `events` WHERE `event_user_id` = :user_id", [
				':user_id'=>$user_id,
			]);
		}

		public function getEventById($event_id) {
			return $this->db->query("SELECT * FROM `events` WHERE `event_id` = :event_id", [
				':event_id'=>$event_id,
			]);
		}

		public function deleteEventById($event_id) {
			return $this->db->query("DELETE FROM `events` WHERE `event_id` = :event_id", [
				':event_id'=>$event_id,
			]);
		}

		public function eventUpdateById($event_id, $data) {
			$event_title = $data['event_title'];
			$event_desc = $data['event_desc'];
			$event_points = $data['event_score'];
			$event_date = $data['event_date'];
			$event_img = $_FILES['event_img']['name'];
			$event_coords = $data['event_coords'];
			
			$coords = explode(',', $event_coords);
			$coordX = $coords[0];
			$coordY = $coords[1];

			move_uploaded_file($_FILES['event_img']['tmp_name'], __DIR__ . '/../../../public/images/' . $event_img);

			return $this->db->query("UPDATE `events` SET `event_title` = :event_title, `event_description` = :event_desc, `event_points` = :event_points, `event_date` = :event_date, `event_img` = :event_img, `event_point_x` = :event_coordX, `event_point_y` = :event_coordY WHERE `event_id` = :event_id", [
				':event_id'=>$event_id,
				':event_title'=>$event_title,
				':event_desc'=>$event_desc,
				':event_points'=>$event_points,
				':event_date'=>$event_date,
				':event_img'=>$event_img,
				':event_coordX'=>$coordX,
				':event_coordY'=>$coordY,
			]);
		}

		public function responseAddEvent($data) {
			$event_title = $data['event_title'];
			$event_desc = $data['event_desc'];
			$event_points = $data['event_score'];
			$event_date = $data['event_date'];
			$event_img = $_FILES['event_img']['name'];
			$event_coords = $data['event_coords'];
			
			$coords = explode(',', $event_coords);
			$coordX = $coords[0];
			$coordY = $coords[1];

			move_uploaded_file($_FILES['event_img']['tmp_name'], __DIR__ . '/../../../public/images/' . $event_img);

			return $this->db->query("INSERT INTO `events`(`event_id`, `event_title`, `event_description`, `event_date`, `event_img`, `event_point_x`, `event_point_y`, `event_points`, `event_user_id`) VALUES (NULL, :event_title, :event_desc, :event_date, :event_img, :event_coordX, :event_coordY, :event_points, :event_user_id)", [
				':event_user_id'=>$_SESSION['user']['id'],
				':event_title'=>$event_title,
				':event_desc'=>$event_desc,
				':event_points'=>$event_points,
				':event_date'=>$event_date,
				':event_img'=>$event_img,
				':event_coordX'=>$coordX,
				':event_coordY'=>$coordY,
			]);
		}

		public function responseAddPartEvent($event_id) {
			return $this->db->query("INSERT INTO `sh_event_user` (`user_id`, `event_id`) VALUES (:user_id, :event_id)", [
				':user_id'=>$_SESSION['user']['id'],
				':event_id'=>$event_id,
			]);
		}

		public function getUsersEvent($event_id) {
			return $this->db->query("
					SELECT u.* 
					FROM `sh_event_user` seu
					JOIN `users` u ON seu.user_id = u.user_id
					WHERE seu.`event_id` = :event_id
			", [
					':event_id' => $event_id,
			]);
	}	

		public function pointsDeclareToUser($user_id, $event_id) {
			$event_info = $this->db->query("SELECT `event_points` FROM `events` WHERE `event_id` = :event_id", [
					':event_id' => $event_id,
			]);
			
			$event_points = $event_info[0]['event_points'];

			$user_info = $this->db->query("SELECT `user_points` FROM `users` WHERE `user_id` = :user_id", [
				':user_id' => $user_id,
			]);

			$user_points = $user_info[0]['user_points'] + $event_points;

			$this->db->query("UPDATE `users` SET `user_points` = :user_points WHERE `user_id` = :user_id", [
					':user_points' => $user_points,
					':user_id' => $user_id,
			]);

			$this->db->query("DELETE FROM `sh_event_user` WHERE `user_id` = :user_id AND `event_id` = :event_id", [
					':event_id' => $event_id,
					':user_id' => $user_id,
			]);
	}
}
