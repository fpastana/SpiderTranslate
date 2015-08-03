-- scripts/data.mysql.sql
--
-- You can begin populating the database with the following SQL statements.

INSERT INTO guestbook (email, comment, created) VALUES
    ('felipeapastana@gmail.com','Olá! Espero que você curta este exemplo de aplicação zf',
    NOW());
INSERT INTO guestbook (email, comment, created) VALUES
    ('ralph.schindler@zend.com',
    'Hello! Hope you enjoy this sample zf application!',
    NOW());