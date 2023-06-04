function duet(){
    let type = document.getElementById("performance").value;
    if (type == "duet"){
    document.getElementById("duet").style.display = "block"
    document.getElementById("first_name_2").setAttribute('required', '')
    document.getElementById("last_name_2").setAttribute('required', '')
    document.getElementById("student_id_2").setAttribute('required', '')
    }
    else {
    document.getElementById("duet").style.display= "none"
    document.getElementById("first_name_2").removeAttribute('required')
    document.getElementById("last_name_2").removeAttribute('required')
    document.getElementById("student_id_2").removeAttribute('required')
    }
}

