<thead>
					<tr>
						<th>No</th>
                        <th>Nip</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Unit</th>
						<th>Role</th>
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
										<a href='#' class='open_modal_detail btn btn-info' nip='$pegawai[nip]'>Detail</a>
										
									</td>
								</tr>";
						}
					?>
				</tbody>