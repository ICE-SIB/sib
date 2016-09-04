CREATE TABLE public.units (
    id serial PRIMARY KEY,
    name varchar NOT NULL,
    symbol varchar NOT NULL
);

INSERT INTO units (name, symbol) VALUES ('Centímetros Cuadrados', 'cm²');
INSERT INTO units (name, symbol) VALUES ('Metros Cuadrados', 'm²');
INSERT INTO units (name, symbol) VALUES ('Centímetros', 'cm');
INSERT INTO units (name, symbol) VALUES ('Metros', 'm');
INSERT INTO units (name, symbol) VALUES ('Pies', 'ft');
INSERT INTO units (name, symbol) VALUES ('Pulgadas', 'in');
INSERT INTO units (name, symbol) VALUES ('Gramos', 'g');
INSERT INTO units (name, symbol) VALUES ('Kilogramos', 'kg');
INSERT INTO units (name, symbol) VALUES ('Metros Cúbicos', 'm³');
INSERT INTO units (name, symbol) VALUES ('Galónes', 'gal');
INSERT INTO units (name, symbol) VALUES ('Mililitros', 'mL');
INSERT INTO units (name, symbol) VALUES ('Litros', 'L');
INSERT INTO units (name, symbol) VALUES ('Cuartos', 'qt');
INSERT INTO units (name, symbol) VALUES ('Cada Uno', 'c/u');

ALTER TABLE materials ADD unit_id integer references units;
ALTER TABLE materials DROP COLUMN unit_type;
