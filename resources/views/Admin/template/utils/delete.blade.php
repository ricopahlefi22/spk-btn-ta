<form action="{{$url}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
											@csrf
											@method("delete")
										<a class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i></a>
										</form>