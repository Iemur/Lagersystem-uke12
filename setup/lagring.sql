CREATE TABLE brukere (
	id INT NOT NULL AUTO_INCREMENT, 
    brukernavn TEXT NOT NULL, 
    passord TEXT NOT NULL, 
    PRIMARY KEY (id)
);

CREATE TABLE esker (
	id INT NOT NULL AUTO_INCREMENT, 
    eske_nummer INT NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    added_by INT NOT NULL, 
    PRIMARY KEY (id), 
    FOREIGN KEY(added_by) REFERENCES brukere(id)
);
    
CREATE TABLE objekter (
	id INT NOT NULL AUTO_INCREMENT, 
    beskrivelse TEXT NOT NULL,
    eske_id INT NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    added_by INT NOT NULL, 
    PRIMARY KEY (id), 
    FOREIGN KEY(eske_id) REFERENCES esker(id)
);

CREATE TABLE accesslog (
	id INT NOT NULL AUTO_INCREMENT, 
    brukernavn TEXT NOT NULL, 
    ip TEXT,
    access_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

INSERT INTO `brukere` (`brukernavn`, `passord`) VALUES ('admin', '$2b$12$eSx/caIjFeC0qDVbLlhQPeHmY3pUEDcTcXcnFLO5kIaZCLtTUIQPW');
COMMIT;