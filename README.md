# Parking
Parking control made with PHP, jQuery and Ajax
## Getting started
1. Go to the *API/db/ConnectionClass.php* file and change:
```
 public function openConnection() {
     $host = 'yourHost';
     $db = 'yourDatabaseName';
     $user = 'yourUser';
     $password = 'yourPassword';
     $this->conn = new mysqli($host, $user, $password, $db, "3308");
 }
```
**You may need to change your bank connection port at:**
```
$this->conn = new mysqli($host, $user, $password, $db, "yourPort");
```
2. Create a database. Recommend using these names to avoid problems:
* Database: estacionamento;
* Tables: *estacionamento*, *historico* and *veiculos*;
* estacionamento columns: *id*, *id_veiculo* and *entrada*;
* historico columns: *id*, *id_veiculo*, *entrada*, *saida*, *valor* and *estadia*;
* veiculos columns: *id*, *modelo*, *placa* and *cliente*.
