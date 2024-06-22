<?php
    session_start();
    session_destroy();//Penghapusan Sesi
    echo "<script>location='/included_all/admin_menu/login.php'</script>";//Kembalikan ke halaman index
?>