	CREATE TABLE IF NOT EXISTS monitoramento(
		id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		usuario_id int(10) UNSIGNED,
		umidade varchar(255),
		temperatura varchar(255),
		gas varchar(255),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
		PRIMARY KEY (id)
	);