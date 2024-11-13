const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
const PORT = 5000;

app.use(cors());
app.use(express.json());

// Configura la conexión a la base de datos MySQL
const db = mysql.createConnection({
    host: 'localhost', // Dirección del servidor de MySQL
    user: 'hostname',      // Usuario de la base de datos
    password: 'sa14',      // Contraseña del usuario
    database: 'Vik_database' // Nombre de la base de datos
});

// Conecta a la base de datos
db.connect(err => {
    if (err) {
        console.error('Error al conectar a la base de datos:', err);
        return;
    }
    console.log('Conectado a la base de datos MySQL');
});

app.get('/api/usuarios', (req, res) => {
    const query ='SELECT id_usuario, nombre, contraseña, correo, rol FROM Usuarios'; 
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).json({ error: 'Error al obtener los datos' });
        } else {
            res.json(results);
        }
    });
});
