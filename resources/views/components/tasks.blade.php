

        <div class="task">
            <div class="title">
                <input type="checkbox" name="" id="checkerId" onchange="checkerInput(this)" data-id="{{$data->id}}" {{$data['is_done'] ? "checked" : null}} >
                <h3>{{$data['title']}}</h3>
            </div>


            <div class="priority">
                <div class="sphere"></div>
                <div>{{$data->category['title']}}</div>
            </div>

            <div class="actions">
                <a href="{{route("task.edit", ['id' => $data['id']])}}"><img src="/assets/images/icon-edit.png" alt=""></a>
                <a href="{{route("task.delete", ['id' => $data['id']])}}"><img src="/assets/images/icon-delete.png" alt=""></a>
            </div>

        </div>


