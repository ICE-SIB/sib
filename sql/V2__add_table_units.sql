CREATE TABLE public.units (
    id serial PRIMARY KEY,
    name varchar NOT NULL,
    symbol varchar NOT NULL
);

ALTER TABLE materials ADD unit_id integer references units;
ALTER TABLE materials DROP COLUMN unit_type;
