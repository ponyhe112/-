function register() {

    document.getElementById("act").action = "register.php";

}
function login(){
    let input = document.getElementsByName("isadmin");

    for (let i = 0; i < input.length; i++) {
        if (input[i].checked) {
            // alert(input[i].value);
            if (input[i].value == "学生")
                document.getElementById("act").action = "login_check.php";
            else {
                document.getElementById("act").action = "login_checkadmin.php";
            }
        }
    }
}