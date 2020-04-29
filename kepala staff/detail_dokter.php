<thead>
					<tr>
                        <th>Nomor</th>
						<th>NIP</th>
                        <th>NAMA</th>
                        <th>JABATAN</th>
						<th>UNIT</th>
						<th>ROLE</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        $no=0; //variable no
						$querypegawai = mysqli_query ($connect, "SELECT nip, nama, jabatan, unit, role FROM pegawai");
						if($querypegawai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($connect));
						}
						while ($pegawai = mysqli_fetch_array ($querypegawai)){
                            $no++;
							
							echo "
                                <tr>
                                    <td>$no</td>
									<td>$pegawai[nip]</td>
									<td>$pegawai[nama]</td>
									<td>$pegawai[jabatan]</td>
									<td>$pegawai[unit]</td>
									<td>$pegawai[role]</td>
									<td>
										<a href='#' class='open_modal btn btn-primary' id_user='$user[id_user]'>Edit</a> 
										<a href='#' class='btn btn-danger' onClick='confirm_delete(\"users_delete.php?id_user=$user[id_user]\")'>Delete</a>
								</tr>";
						}
					?>
				</tbody>