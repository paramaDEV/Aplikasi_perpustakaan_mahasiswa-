$(document).ready(()=>{
    let base_url=`http://localhost/Aplikasi_perpustakaan_mahasiswa-/`;
    let generate_jurusan = (key,jurusan)=>{
        let option="";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = ()=>{
            if(xhr.readyState==4 && xhr.status==200){
                let data = JSON.parse(xhr.responseText);
            
                data.forEach(e=>{
                        let {id,nm_jurusan}=e;
                        option+=`<option value=${id}>${nm_jurusan}</option>`;
                        
                });
                $(jurusan).html(option);

            }
        }
        xhr.open('GET',`${base_url}index.php/admin_controller/data_jurusan/${key}`,true);
        xhr.send();
    };

    // generate_jurusan(1,"#jurusan");
    
    $("#fakultas").change(()=>{
        generate_jurusan($("#fakultas").val(),"#jurusan");

    });
});