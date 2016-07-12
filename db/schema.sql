DROP TABLE IF EXISTS inventories, materials, deposits, withdrawals, machine_deployments, machines, warehouses, users;

CREATE TABLE public.warehouses (
    id SERIAL PRIMARY KEY,
    project_name VARCHAR NOT NULL
);

CREATE TABLE public.machines (
    id SERIAL PRIMARY KEY,
    warehouse_id INTEGER NOT NULL REFERENCES warehouses,
    code INTEGER NOT NULL UNIQUE,
    name VARCHAR NOT NULL,
    is_active BOOLEAN NOT NULL,
    description VARCHAR
);

CREATE TABLE public.materials (
    id SERIAL PRIMARY KEY,
    code INTEGER NOT NULL UNIQUE,
    name VARCHAR NOT NULL,
    unit_type VARCHAR NOT NULL
);

CREATE TABLE public.inventories (
    id SERIAL PRIMARY KEY,
    material_id INTEGER NOT NULL REFERENCES materials,
    warehouse_id INTEGER NOT NULL REFERENCES warehouses,
    stock INTEGER NOT NULL,
    area INTEGER NOT NULL,
    shelf INTEGER NOT NULL,
    body INTEGER NOT NULL,
    side INTEGER NOT NULL,
    platter INTEGER NOT NULL,
    additional_notes VARCHAR,
    UNIQUE(material_id, warehouse_id)
);

CREATE TABLE public.users (
    id SERIAL PRIMARY KEY,
    role CHAR(1) NOT NULL DEFAULT 'e',
    first_name VARCHAR NOT NULL,
    last_name VARCHAR NOT NULL,
    username VARCHAR NOT NULL UNIQUE,
    password VARCHAR NOT NULL
);

CREATE TABLE public.machine_deployments (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users,
    machine_id INTEGER NOT NULL REFERENCES machines,
    from_warehouse INTEGER NOT NULL REFERENCES warehouses,
    to_warehouse INTEGER NOT NULL REFERENCES warehouses,
    responsible VARCHAR NOT NULL,
    management_center VARCHAR NOT NULL,
    rate_type CHAR(1) NOT NULL,
    service_order VARCHAR NOT NULL,
    datetime TIMESTAMP NOT NULL
);

CREATE TABLE public.deposits (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users,
    inventory_id INTEGER NOT NULL REFERENCES inventories,
    receipt_number INTEGER,
    quantity INTEGER NOT NULL,
    datetime TIMESTAMP NOT NULL
);

CREATE TABLE public.withdrawals (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users,
    inventory_id INTEGER NOT NULL REFERENCES inventories,
    responsible VARCHAR NOT NULL,
    quantity INTEGER NOT NULL,
    datetime TIMESTAMP NOT NULL
);

