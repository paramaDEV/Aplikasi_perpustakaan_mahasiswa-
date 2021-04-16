$(document).ready(()=>{
    
    let generate_jurusan = (key,jurusan,isTrue=false)=>{
        let option="";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = ()=>{
            if(xhr.readyState==4 && xhr.status==200){
                let data = JSON.parse(xhr.responseText);
                if(isTrue==true){
                    generate_table(data[0].id);
                }
                data.forEach(e=>{
                        let {id,nm_jurusan}=e;
                        option+=`<option value=${id}>${nm_jurusan}</option>`;
                        
                });
                $(jurusan).html(option);

            }
        }
        xhr.open('GET',`http://localhost/Aplikasi_perpustakaan_mahasiswa-/index.php/admin_controller/data_jurusan/${key}`,true);
        xhr.send();
    };

    let generate_table = (id)=>{
        let table =`<thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>TTL</th>
          <th>Jurusan</th>
          <th>Fakultas</th>
          <th>Action</th>
        </tr>
      </thead>`;
        let base_url="http://localhost/Aplikasi_perpustakaan_mahasiswa-/";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = ()=>{
            if(xhr.readyState==4 && xhr.status==200){
                let data = JSON.parse(xhr.responseText);
                
                let no =1;
                data.forEach(e=>{
                    table +=`
                    <tr>
                    <td>${no++}</td>
                    <td>${e.nama}</td>
                    <td>${e.nim}</td>
                    <td>${e.ttl}</td>
                    <td>${e.nm_jurusan}</td>
                    <td>${e.nm_fakultas}</td>
                    <td colspan=3><a href='${base_url}admin_controller/detail_anggota/${e.id}'>
                    <button type='button' class='btn btn-primary' >Detail
                    </button></a>
                    <a href='${base_url}admin_controller/hal_update_anggota/${e.id}'>
                    <button type='button' class='btn btn-success' >Edit
                    </button></a>
                    </td>
                  </tr>`;
                });
                $("table").html(table);
                
            }
        }
        xhr.open('GET',`http://localhost/Aplikasi_perpustakaan_mahasiswa-/index.php/admin_controller/data_anggota/${id}`,true);
        xhr.send();
    }

    
    generate_jurusan(1,"#jurusan1");
    generate_jurusan(1,"#jurusan2");
    generate_table(1);
    
    $("#fakultas1").change(()=>{
        generate_jurusan($("#fakultas1").val(),"#jurusan1",true);

    });
    $("#fakultas2").change(()=>{
        generate_jurusan($("#fakultas2").val(),"#jurusan2");    
    });

    $("#jurusan1").change(()=>{
        generate_table($("#jurusan1").val());
    })
});