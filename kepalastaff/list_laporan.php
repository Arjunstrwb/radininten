<thead>
					<tr>
						<th>No</th>
                        <th>Nomor Dokumen</th>
						<th>Nama Dokumen</th>
						<th>Tanggal Dokumen</th>
						<th>Tujuan Dokumen</th>
						<th>File Dokumen</th>
						<th>Komentar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        $no=0; //variable no

$tgl_mulai = $_GET['tgl_mulai'];
$tgl_sampai = $_GET['tgl_sampai'];

if ($tgl_mulai != "" AND $tgl_sampai != "") {
	$querydokumen = mysqli_query ($connect, "SELECT * FROM dokumen WHERE tujuan_dokumen ='kepala koordinator' AND tanggal_dokumen BETWEEN '$tgl_mulai' AND '$tgl_sampai' ORDER BY id DESC");
} else {
	$querydokumen = mysqli_query ($connect, "SELECT * FROM dokumen WHERE tujuan_dokumen ='kepala koordinator' ORDER BY id DESC");
}

						
						if($querydokumen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($connect));
						}
						while ($dokumen = mysqli_fetch_array ($querydokumen)){
                            $no++;
						?>
						
                                <tr>
									<td><?=$no;?></td>
                                    <td><?=$dokumen[nomor_dokumen];?></td>
									<td><?=$dokumen[nama_dokumen];?></td>
									<td><?=$dokumen[tanggal_dokumen];?></td>
									<td><?=$dokumen[tujuan_dokumen];?></td>
									<td><?=$dokumen[nama_dokumen];?></td>
									<td><?=$dokumen[komentar];?></td>
									<td><a href='http://localhost/radinintenbaru/pegawaikampen/<?=$dokumen[file_dokumen];?>' class='open_modal_detail btn btn-info' dokumen='$dokumen[nomor_dokumen]'>Detail</a></td>
									
					<form method="POST" action="komentar.php">
					<input type="hidden" value="<?= $dokumen[id];?>" name="id">
					<td>
					<input type="submit" class="open_modal_edit btn btn-primary" value="Komentari">
					</td>
					</form>
					
					</tr>
					
					<?php }?>
				</tbody>