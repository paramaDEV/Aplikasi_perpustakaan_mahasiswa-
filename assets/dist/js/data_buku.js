$(document).ready(()=>{
    let base_url='http://localhost/Aplikasi_perpustakaan_mahasiswa-/';
    let generateTable= idtema=>{
        let table=`<thead><tr>
                    <th>#</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Action</th>
                    </tr>
                </thead>`;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange=()=>{
            if(xhr.readyState==4 && xhr.status==200){
                let data=JSON.parse(xhr.responseText);
                let no=1;
                data.forEach(e=> {
                    let{id,kode_buku,judul}=e;
                    table+=`<tr>
                    <td>${no++}</td>
                    <td>${kode_buku}</td>
                    <td>${judul}</td>
                    <td colspan=3><a href='${base_url}admin_controller/detail_buku/${id}'>
                    <button type="button" class="btn btn-primary" >Detail
                    </button></a>
                    <a href='${base_url}admin_controller/hal_update_buku/${id}'>
                    <button type="button" class="btn btn-success" >Edit
                    </button></a>
                </tr>`;
                });
               $("table").html(table);
            }
        }
        
        xhr.open('GET',`${base_url}admin_controller/data_buku_by_tema/${idtema}`,true);
        xhr.send(); 
    };
    generateTable(1);
    $("#tema-select").change(()=>{
        generateTable($("#tema-select").val());
    })
});