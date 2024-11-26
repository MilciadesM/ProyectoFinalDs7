/* 
Server: proyectstore.database.windows.net
User: administrador
Password: b8b8c05f-fbdb-4f7e-93ef-14b56102c351 
*/

CREATE TABLE administradores (
    admin_id NVARCHAR(50) PRIMARY KEY,
    usuario NVARCHAR(50) UNIQUE NOT NULL,
    nombre NVARCHAR(50) NOT NULL,
    apellido NVARCHAR(50) NOT NULL,
    telefono NVARCHAR(20) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    cliente_id NVARCHAR(50) PRIMARY KEY,
    usuario NVARCHAR(50) UNIQUE NOT NULL,
    nombre NVARCHAR(50) NOT NULL,
    apellido NVARCHAR(50) NOT NULL,
    telefono NVARCHAR(20) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL
);

CREATE TABLE marcas (
    marca_id NVARCHAR(50) PRIMARY KEY,
    nombre NVARCHAR(100) NOT NULL
);

CREATE TABLE categorias (
    categoria_id NVARCHAR(50) PRIMARY KEY,
    nombre NVARCHAR(100) NOT NULL,
    descripcion NVARCHAR(100)
);

CREATE TABLE productos (
    producto_id NVARCHAR(50) PRIMARY KEY,
    categoria_id NVARCHAR(50),
    marca_id NVARCHAR(50),
    nombre NVARCHAR(100) NOT NULL,
    descripcion NVARCHAR(500),
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    img NVARCHAR(50),
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id),
    FOREIGN KEY (marca_id) REFERENCES marcas(marca_id)
);
   
CREATE TABLE carrito (
    carrito_id NVARCHAR(50) PRIMARY KEY,
    cliente_id NVARCHAR(50) NOT NULL,
    producto_id NVARCHAR(50) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id),
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
);

CREATE TABLE compras (
    compras_id NVARCHAR(50) PRIMARY KEY,
    cliente_id NVARCHAR(50) NOT NULL,
    producto_id NVARCHAR(50) NOT NULL,
    factura_id NVARCHAR(50) NOT NULL,
    pais NVARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id),
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
);


INSERT INTO marcas (marca_id, nombre) VALUES 
('550e8400-e29b-41d4-a716-446655440000', 'APPLE'),
('550e8400-e29b-41d4-a716-446655440001', 'BELKIN'),
('550e8400-e29b-41d4-a716-446655440002', 'CANON'),
('550e8400-e29b-41d4-a716-446655440003', 'CUBITT'),
('550e8400-e29b-41d4-a716-446655440004', 'CUISINART'),
('550e8400-e29b-41d4-a716-446655440005', 'DRIJA'),
('550e8400-e29b-41d4-a716-446655440006', 'FRIGIDAIRE'),
('550e8400-e29b-41d4-a716-446655440007', 'HISENSE'),
('550e8400-e29b-41d4-a716-446655440008', 'HONOR'),
('550e8400-e29b-41d4-a716-446655440009', 'HP'),
('550e8400-e29b-41d4-a716-44665544000a', 'INSTA360'),
('550e8400-e29b-41d4-a716-44665544000b', 'JBL'),
('550e8400-e29b-41d4-a716-44665544000c', 'KITCHEN AID'),
('550e8400-e29b-41d4-a716-44665544000d', 'KLIP XTREME'),
('550e8400-e29b-41d4-a716-44665544000e', 'LG'),
('550e8400-e29b-41d4-a716-44665544000f', 'LOGITECH'),
('550e8400-e29b-41d4-a716-446655440010', 'MAXELL'),
('550e8400-e29b-41d4-a716-446655440011', 'MOTOROLA'),
('550e8400-e29b-41d4-a716-446655440012', 'NINTENDO'),
('550e8400-e29b-41d4-a716-446655440013', 'NISATO'),
('550e8400-e29b-41d4-a716-446655440014', 'OSTER'),
('550e8400-e29b-41d4-a716-446655440015', 'PANASONIC'),
('550e8400-e29b-41d4-a716-446655440016', 'PHILIPS'),
('550e8400-e29b-41d4-a716-446655440017', 'SAMSUNG'),
('550e8400-e29b-41d4-a716-446655440018', 'SKULLCANDY'),
('550e8400-e29b-41d4-a716-446655440019', 'SONOS'),
('550e8400-e29b-41d4-a716-44665544001a', 'SONY'),
('550e8400-e29b-41d4-a716-44665544001b', 'TCL'),
('550e8400-e29b-41d4-a716-44665544001c', 'WHIRLPOOL'),
('550e8400-e29b-41d4-a716-44665544001d', 'XIAOMI');

INSERT INTO categorias (categoria_id, nombre, descripcion)
VALUES 
    ('d290f1ee-6c54-4b01-90e6-d701748f0851', 'TV y Video', 'Productos relacionados con televisores y dispositivos de video.'),
    ('3d6f0a95-8f53-4f5e-81d9-108b78f90cf1', 'Audio', 'Equipos de sonido y accesorios de audio.'),
    ('bd65600d-8669-4903-8a14-af88203add38', 'Celulares y Tablets', 'Dispositivos móviles y tablets de diferentes marcas.'),
    ('e902893a-9d22-4c7e-a7b8-1c1e7e3e3a3e', 'Cómputo', 'Computadoras, laptops y accesorios relacionados.'),
    ('db7a8b45-645e-4964-816a-7e2c6206c25e', 'Hogar', 'Productos para el hogar y electrodomésticos.'),
    ('c5a95721-7a3b-4b3c-9224-bd54c80e78d2', 'Cámaras y Lentes', 'Cámaras fotográficas, videocámaras y lentes.'),
    ('0e98559a-4a29-4c5e-b73b-3e8f1deaf5af', 'Consolas y Videojuegos', 'Consolas de videojuegos y títulos disponibles.'),
    ('63e27b7d-3f4f-411e-8349-40d4b4b3a3b1', 'Hogar Inteligente', 'Dispositivos para automatización y control inteligente del hogar.'),
    ('ee1c9e48-0d3c-489b-9d2c-4d847be623b6', 'Smartwatches', 'Relojes inteligentes y wearables.'),
    ('4526dffc-708b-4b96-bc87-02f204a5cb52', 'Maletas y Mochilas', 'Maletas, mochilas y accesorios de viaje.'),
    ('c5f0d7e5-3f2d-4b44-8a88-d77e4d3f1046', 'Salud y Cuidado Personal', 'Productos de salud, belleza y cuidado personal.'),
    ('ae0c3e27-6f3e-4e18-9b62-4f2dcbf97d23', 'Entretenimiento', 'Artículos y dispositivos para el entretenimiento.');

INSERT INTO productos (producto_id, categoria_id, marca_id, nombre, descripcion, precio, stock, img) VALUES 
('850e8400-e27b-51d4-a716-246635440000','3d6f0a95-8f53-4f5e-81d9-108b78f90cf1', '550e8400-e29b-41d4-a716-446655440017', 'Barra de Sonido Samsung', 'TEATRO EN CASA SAMSUNG HW-Q600C/ZP 360W 3.1.2 CANALES. PARA OBTENER UN POTENTE SONIDO APRECIE LA HISTORIA, EL CONCIERTO O LA BANDA SONORA EN UN NIVEL MÁS PROFUNDO CON EL MATIZ TRIDIMENSIONAL DEL VERDADERO SONIDO DOLBY ATMOS DE 3.1.2 CANALES. ESCUCHE MEJOR LAS VOCES, INCLUSO A BAJO VOLUMEN, CON SONIDO ADAPTABLE Y AUDIO OPTIMIZADO DE FORMA INTELIGENTE', '249.95', '10', '003.jpg');