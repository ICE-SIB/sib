ALTER TABLE machine_deployments DROP COLUMN rate_type;
ALTER TABLE machine_deployments DROP CONSTRAINT location;

ALTER TABLE machines RENAME COLUMN code TO asset_number;
ALTER TABLE machines ADD COLUMN rate_type char(1) NOT NULL;
ALTER TABLE machines ADD CONSTRAINT valid_rate_type CHECK (rate_type IN ('h', 'd'));
