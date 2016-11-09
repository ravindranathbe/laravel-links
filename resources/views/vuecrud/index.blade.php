@extends('layouts.app')
@section('content')
    <div class="row form-group add">
        <div class="col-md-12">
            <h1>Laravel App with CRUD</h1>
        </div>
        <div class="col-md-12">
          <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">Create new post</button>
        </div>
    </div>
    <!--div class="row">
      <div class="col-md-12">
          <p>@{{ testTitle }}</p>
      </div>
    </div-->
    <div class="row">
      <div class="table-responsive">
        <table class="table table-borderless">
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
          <tr v-for="item in items">
            <td>@{{ item.title }}</td>
            <td>@{{ item.description }}</td>
            <td>
              <button class="btn edit-modal btn-warning" v-on:click.prevent="editItem(item)">
                <span class="glyphicon glyphicon-edit"></span> Edit
              </button>
              <button class="btn edit-modal btn-warning" v-on:click.prevent="deleteItem(item)">
                <span class="glyphicon glyphicon-trash"></span> Delete
              </button>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <nav>
      <ul class="pagination">
        <li v-if="pagination.current_page > 1">
          <a href="#" v-on:click.prevent="changePage(pagination.current_page - 1)"><<</a>
        </li>
        <li v-for="page in pagesNumber">
          <a href="#" v-on:click.prevent="changePage(page)" v-bind:class="[page == isActivated ? 'active' : '']">@{{ page }}</a>
        </li>
        <li v-if="pagination.current_page < pagination.last_page">
          <a href="#" v-on:click.prevent="changePage(pagination.current_page + 1)">>></a>
        </li>
      </ul>
    </nav>

    <div class="modal fade" id="create-item">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span>x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Create new post</h4>
          </div>
          <div class="modal-body">
            <form class="" method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
              <input type="hidden" name="_method" value="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label>Title: <input type="text" name="title" class="form-control" v-model="newItem.title" /></label>
                <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
              </div>
              <div class="form-group">
                <label>Description: <textarea type="text" name="description" class="form-control" v-model="newItem.description"></textarea></label>
                <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit-item">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span>x</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit post</h4>
          </div>
          <div class="modal-body">
            <form class="" method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
              <div class="form-group">
                <label>Title: <input type="text" name="title" class="form-control" v-model="fillItem.title" /></label>
                <span v-if="formErrorsEdit['title']" class="error text-danger">@{{ formErrorsEdit['title'] }}</span>
              </div>
              <div class="form-group">
                <label>Description: <textarea type="text" name="description" class="form-control" v-model="fillItem.description"></textarea></label>
                <span v-if="formErrorsEdit['description']" class="error text-danger">@{{ formErrorsEdit['description'] }}</span>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
