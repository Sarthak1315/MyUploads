CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;


ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


CREATE TABLE `up_detail` (
  `sr_no` int(11) NOT NULL PRIMARY KEY,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file_name` text NOT NULL,
  `file_type` text NOT NULL,
  `file_path` text NOT NULL,
  `file_tmp_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `up_detail`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

ALTER TABLE `up_detail`
  ADD CONSTRAINT `up_detail_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `login` (`user_name`);


COMMIT;

