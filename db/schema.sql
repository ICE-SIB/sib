DROP TABLE IF EXISTS inventories, materials, deposits, withdrawals, machine_deployments, machines, warehouses, users;

CREATE TABLE public.warehouses (
    id serial PRIMARY KEY,
    project_name varchar NOT NULL
);

CREATE TABLE public.machines (
    id serial PRIMARY KEY,
    warehouse_id integer NOT NULL REFERENCES warehouses,
    code integer NOT NULL UNIQUE,
    name varchar NOT NULL,
    is_active boolean NOT NULL,
    description text
);

CREATE TABLE public.materials (
    id serial PRIMARY KEY,
    code integer NOT NULL UNIQUE,
    name varchar NOT NULL,
    unit_type varchar NOT NULL
);

CREATE TABLE public.inventories (
    id serial PRIMARY KEY,
    material_id integer NOT NULL REFERENCES materials,
    warehouse_id integer NOT NULL REFERENCES warehouses,
    stock integer NOT NULL DEFAULT 0,
    area integer NOT NULL,
    shelf integer NOT NULL,
    body integer NOT NULL,
    side integer NOT NULL,
    platter integer NOT NULL,
    additional_notes text,
    UNIQUE(material_id, warehouse_id),
    CONSTRAINT positive_stock CHECK (stock >= 0)
);

CREATE TABLE public.users (
    id serial PRIMARY KEY,
    role char(1) NOT NULL DEFAULT 'e',
    first_name varchar NOT NULL,
    last_name varchar NOT NULL,
    username varchar NOT NULL UNIQUE,
    password varchar NOT NULL,
    CONSTRAINT valid_roles CHECK (role IN ('a', 'o', 'e'))
);

CREATE TABLE public.machine_deployments (
    id serial PRIMARY KEY,
    user_id integer NOT NULL REFERENCES users,
    machine_id integer NOT NULL REFERENCES machines,
    from_warehouse integer NOT NULL REFERENCES warehouses,
    to_warehouse integer NOT NULL REFERENCES warehouses,
    responsible varchar NOT NULL,
    management_center varchar NOT NULL,
    rate_type char(1) NOT NULL,
    service_order varchar NOT NULL,
    datetime timestamp NOT NULL DEFAULT now(),
    CONSTRAINT location CHECK (from_warehouse != to_warehouse),
    CONSTRAINT valid_rate_type CHECK (rate_type IN ('h', 'd'))
);

CREATE TABLE public.deposits (
    id serial PRIMARY KEY,
    user_id integer NOT NULL REFERENCES users,
    inventory_id integer NOT NULL REFERENCES inventories,
    receipt_number integer,
    quantity integer NOT NULL,
    datetime timestamp NOT NULL DEFAULT now(),
    CONSTRAINT deposit_positive_quantity CHECK (quantity > 0)
);

CREATE TABLE public.withdrawals (
    id serial PRIMARY KEY,
    user_id integer NOT NULL REFERENCES users,
    inventory_id integer NOT NULL REFERENCES inventories,
    responsible varchar NOT NULL,
    quantity integer NOT NULL,
    datetime timestamp NOT NULL DEFAULT now(),
    CONSTRAINT withdrawal_positive_quantity CHECK (quantity > 0)
);

