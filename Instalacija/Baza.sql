CREATE TYPE vrsta_centra AS ENUM (
	'policija',
	'bolnica',
	'vatrogasci'
);

CREATE TYPE vrsta_incidenta AS ENUM (
	'policijska_intervencija',
	'medicinska_intervencija',
	'poplava',
	'požar'
);

CREATE TABLE centar (
	id SERIAL PRIMARY KEY,
	grad VARCHAR(20),
	adresa VARCHAR(40),
	kucni_broj SMALLINT,
	vrsta vrsta_centra,
	kontakt VARCHAR(20),
	pozicija point
);

CREATE TABLE korisnik (
	id SERIAL PRIMARY KEY,
	ime VARCHAR(20),
	prezime VARCHAR(20),
	korisnicko_ime VARCHAR(20),
	lozinka VARCHAR(40)
);

CREATE TABLE incident (
	id SERIAL PRIMARY KEY,
	naziv VARCHAR(40),
	grad VARCHAR(20),
	adresa VARCHAR(30),
	kucni_broj VARCHAR(5),
	dat_i_vr_pocetka TIMESTAMP,
	trajanje INTERVAL,
	vrsta vrsta_incidenta,
	korisnik_id SMALLINT
	REFERENCES korisnik(id)
	ON DELETE RESTRICT ON
	UPDATE RESTRICT,
	centar_id SMALLINT
	REFERENCES centar(id)
	ON DELETE RESTRICT ON
	UPDATE RESTRICT,
	otvoren BOOLEAN
);

CREATE FUNCTION calculate_duration() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	IF OLD.otvoren = 'TRUE' THEN
		NEW.otvoren = FALSE;
		NEW.trajanje = current_timestamp - OLD.dat_i_vr_pocetka;
	END IF;
RETURN NEW;
END; $$;

CREATE FUNCTION set_timestamp() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.dat_i_vr_pocetka=current_timestamp;
	NEW.otvoren='TRUE';
RETURN NEW;
END; $$;

CREATE TRIGGER on_incident_closure BEFORE UPDATE ON 
incident FOR EACH ROW EXECUTE PROCEDURE calculate_duration();

CREATE TRIGGER on_incident_insert BEFORE INSERT ON 
incident FOR EACH ROW EXECUTE PROCEDURE set_timestamp();

INSERT INTO centar VALUES (1, 'Zagreb', 'Ilica', 29, 'policija', '013472998', '(45.812634000000003,15.963711)');
INSERT INTO centar VALUES (2, 'Zagreb', 'Vjekoslava Klaića', 7, 'policija', '013345621', '(45.809246000000002,15.962436)');
INSERT INTO centar VALUES (3, 'Zagreb', 'Prilaz Gjure Deželića', 3, 'bolnica', '013667890', '(45.810817,15.959828999999999)');
INSERT INTO centar VALUES (4, 'Zagreb', 'Bosanska ulica', 10, 'bolnica', '014561873', '(45.814309000000002,15.958842000000001)');
INSERT INTO centar VALUES (5, 'Zagreb', 'Britanski trg', 5, 'vatrogasci', '014562890', '(45.813374000000003,15.964345)');
INSERT INTO centar VALUES (6, 'Zagreb', 'Vladimira Nazora', 17, 'vatrogasci', '012318776', '(45.815168999999997,15.966212000000001)');

INSERT INTO korisnik VALUES (4, 'Perica', 'Perić', 'perica', 'perica');

INSERT INTO incident VALUES (6, 'Krađa robe', 'Zagreb', 'Ilica', '82', '2013-09-08 05:22:49.938', NULL, 'policijska_intervencija', 4, 1, true);
INSERT INTO incident VALUES (8, 'Poplava', 'Zagreb', 'Medulićeva ul.', '17', '2013-09-08 05:25:31.679', NULL, 'poplava', 4, 5, true);
INSERT INTO incident VALUES (7, 'Srčan napad', 'Zagreb', 'Buconjićeva ul.', '12', '2013-09-08 05:24:33.344', '13:39:00.472', 'medicinska_intervencija', 4, 3, false);
