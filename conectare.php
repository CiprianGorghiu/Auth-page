<?php
// preluam datele din formular
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

// conectam la baza de date
$conn = mysqli_connect('localhost', 'id19076202_test', '@d9+K79{glwGePKH', 'id19076202_users');

// Verifică conexiunea
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Verificăm dacă există deja un utilizator cu același nume de utilizator
$sql = "SELECT * FROM utilizatori WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Acest nume de utilizator este deja luat.";
} else {
    // În caz contrar, inserăm datele utilizatorului în tabel
    $sql = "INSERT INTO utilizatori (username, email, password, gender) VALUES ('$username', '$email', '$password', '$gender')";

    if (mysqli_query($conn, $sql)) {
      echo "User registered successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
