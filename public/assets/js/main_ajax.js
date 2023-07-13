if (document.querySelector("#add_student") != null) {
    let add_student_form = document.querySelector("#add_student");
    add_student_form.onsubmit = async (e)=>{
        e.preventDefault();
        let submit_btn = add_student_form.querySelector(".btn"); 
        submit_btn.value = "wait..."
        let ajax = {
            method : "post",
            body : new FormData(add_student_form)
        }
        let request = await fetch("./create",ajax);
        let response = await request.json();
        console.log(response);
        if (response.result === "success") {
            submit_btn.value = "Add"
            let success = add_student_form.querySelector(".success");
            success.textContent = "Added Successfully";
            success.classList.remove("d-none")
            setTimeout(()=>{
                success.classList.add("d-none")
                success.textContent = "";
                window.location.href = "/";
            },2000)
        }else{
            submit_btn.value = "Add"
            let error = add_student_form.querySelector(".error");
            error.textContent = response.result;
            error.classList.remove("d-none")
            setTimeout(()=>{
                error.classList.add("d-none")
                error.textContent = "";
            },2000)
        }
    }
}
if (document.querySelector("#update_student") != null) {
    let update_student_form = document.querySelector("#update_student");
    update_student_form.onsubmit = async (e)=>{
        e.preventDefault();
        let submit_btn = update_student_form.querySelector(".btn"); 
        submit_btn.value = "wait..."
        let ajax = {
            method : "post",
            body : new FormData(update_student_form)
        }
        let request = await fetch(`/students/${document.querySelector("#sid").value}/edit`,ajax);
        let response = await request.json();
        if (response.result === "success") {
            submit_btn.value = "Update"
            let success = update_student_form.querySelector(".success");
            success.textContent = "Updated Successfully";
            success.classList.remove("d-none")
            setTimeout(()=>{
                success.classList.add("d-none")
                success.textContent = "";
                window.location.href = "/";
            },2000)
        }else{
            submit_btn.value = "Update"
            let error = update_student_form.querySelector(".error");
            error.textContent = response.result;
            error.classList.remove("d-none")
            setTimeout(()=>{
                error.classList.add("d-none")
                error.textContent = "";
            },2000)
        }
    }
}

async function remove(id) {
    if (confirm("Are you confirm to delete this record")) {
          let request = await fetch(`/students/${id}/delete`);
    let response = await request.json();
    if (response.result === "success") {
        document.querySelector(".row"+id).remove();
    }
    }
  
}
