<?php 
include ("Template/header.php");
include('../inc/function.php');

$allAdmin = getAllUsers();
?>

    <div class="container mt-5">
        <h1>Liste des Administrateurs</h1>
        
        <div class="mb-4"><input class="form-control" id="searchAdmin" onkeyup="searchTableAdmin()" type="search" placeholder="Rechercher par nom, prénom ou email" aria-label="Rechercher"></div>
        
        <!-- Tableau des administrateurs -->
        <table class="table table-bordered" id="tableAdmin">
            <thead class="thead-light">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allAdmin as $data) { ?>
                <tr>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<script>
    function searchTableAdmin() {
        var input = document.getElementById("searchAdmin").value.toLowerCase();
        var table = document.getElementById("tableAdmin");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var tdNom = tr[i].getElementsByTagName("td")[0];
            var tdPrenom = tr[i].getElementsByTagName("td")[1];
            var tdEmail = tr[i].getElementsByTagName("td")[2];

            if (tdNom || tdPrenom || tdEmail) {
                var txtValueNom = tdNom.textContent || tdNom.innerText;
                var txtValuePrenom = tdPrenom.textContent || tdPrenom.innerText;
                var txtValueEmail = tdEmail.textContent || tdEmail.innerText;

                if (txtValueNom.toLowerCase().indexOf(input) > -1 ||
                    txtValuePrenom.toLowerCase().indexOf(input) > -1 ||
                    txtValueEmail.toLowerCase().indexOf(input) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<?php 
include ("Template/footer.php");
?>