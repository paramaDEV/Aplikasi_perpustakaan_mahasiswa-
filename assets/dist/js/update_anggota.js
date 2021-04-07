$(document).ready(()=>{
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
        xhr.open('GET',`http://localhost/Aplikasi_perpustakaan_mahasiswa-/index.php/main_controller/data_jurusan/${key}`,true);
        xhr.send();
    };

    generate_jurusan(1,"#jurusan");
    
    $("#fakultas").change(()=>{
        generate_jurusan($("#fakultas").val(),"#jurusan");

    });
});