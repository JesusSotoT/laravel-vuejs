@extends('app')

@section('content')
	<div class="row" id="crud">
		<div class="col-xs-12">
			<h1 class="page-header">CRUD Laravel & Vue js</h1>
		</div>
		<div class="col-sm-12">
			<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva tarea</a>
			<table class="table table-hover table-striped">
				<thead>
					<th>#</th>
					<th>Tarea</th>
					<th colspan="2">
						&nbsp;
					</th>
				</thead>
				<tbody>
					<tr v-for="keep in keeps">
						<td width="10px">@{{ keep.id }}</td>
						<td>@{{ keep.keep }}</td>
						<td width="10px">
							<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">Editar</a>
						</td>
						<td width="10px">
							<a class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>

			<nav>
				<ul class="pagination">
					<li v-if="pagination.current_page > 1">
						<a href="#" @click.prevent="changePage(pagination.current_page - 1)">
							<span>Atras</span>
						</a>
					</li>
					
					<li v-for="page in pageNumber" v-bind:class="[page == isActived ? 'active' : '']">
						<a href="#" @click.prevent="changePage(page)">
							@{{ page }}
						</a>
					</li>
					
					<li v-if="pagination.current_page < pagination.last_page">
						<a href="#" @click.prevent="changePage(pagination.current_page + 1)">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>	
			</nav>

			@include('create')
			@include('edit')
		</div>
	</div>
@endsection