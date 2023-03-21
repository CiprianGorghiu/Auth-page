<?php
//conectare la baza de date
$conn = mysqli_connect("localhost", "id19076202_test", "@d9+K79{glwGePKH", "id19076202_users");

//verifică conexiunea
if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

//preluare date din formular
$username = $_POST['username'];
$password = $_POST['password'];

//interogare baza de date pentru a verifica existența utilizatorului și a parolei
$sql = "SELECT * FROM utilizatori WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

//verifică dacă există utilizatorul și parola în baza de date
if (mysqli_num_rows($result) > 0) {
    //utilizatorul a fost găsit, deci putem permite logarea
    echo "Bine ai venit, " . $username . "!";
} else {
    //utilizatorul sau parola sunt incorecte, deci afișăm un mesaj de eroare
    echo "Nume de utilizator sau parolă incorecte!";
}

//închidere conexiune la baza de date
mysqli_close($conn);
?>