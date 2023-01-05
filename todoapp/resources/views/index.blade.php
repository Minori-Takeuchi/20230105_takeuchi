<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <title>COACHTECH</title>
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="ttl">Todo List</p>
      <div class="todo">
        <form action="/create" method="post" class="frex">
          @csrf
          <input type="text" class="input-create" name="name">
          <button class="btn-create">追加</button>
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach($todos as $todo)
          <tr>
            <td>{{$todo->created_at}}</td>
            <form action="/update" method="post">
            @csrf
              <input type="hidden" name="id" value="{{$todo->id}}">
              <td><input type="text" class="input-update" name="new-name" value="{{$todo->name}}"></td>
              <td><button class="btn-update">更新</button></td>
            </form>
            <form action="/delete" method="post">
            @csrf
              <input type="hidden" name="id" value="{{$todo->id}}">
              <td><button class="btn-delete">削除</button></td>
            </form>
            </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div>
</body>
</html>