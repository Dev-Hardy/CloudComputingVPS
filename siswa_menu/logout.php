<?php
    session_start();
    session_destroy();//Penghapusan Sesi
    echo "<script>location='/included_all/login_siswa/login_siswa.php'</script>";//Kembalikan ke halaman index
?>