CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,

    title VARCHAR(255) NOT NULL,
    description TEXT,

    priority VARCHAR(10) NOT NULL DEFAULT 'media',
    status VARCHAR(20) NOT NULL DEFAULT 'pendente',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT chk_priority
        CHECK (priority IN ('baixa', 'media', 'alta')),

    CONSTRAINT chk_status
        CHECK (status IN ('pendente', 'concluida'))
);