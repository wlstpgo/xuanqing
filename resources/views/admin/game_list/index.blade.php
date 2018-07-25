@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">游戏列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.game_list.filter')
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th class="text-center">游戏名称</th>
                        <th  style="width: 10%">所属平台</th>
                        <th  style="width: 10%">游戏类型</th>
                        <th  style="width: 10%">游戏代码</th>
                        <th  style="width: 10%">客户端</th>
                        <th  style="width: 5%">排序</th>
                        <th  style="width: 10%">上线/下线</th>
                        <th  style="width: 15%">操作</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->api->api_name }}
                            </td>
                            <td>
                                {{ config('platform.game_type')[$item->game_type] }}
                            </td>
                            <td>
                                {{ $item->game_id }}
                            </td>
                            <td>
                                {{ config('platform.client_type')[$item->client_type] }}
                            </td>
                            <td>
                                {{ $item->sort }}
                            </td>
                            <td>
                                {!! \App\Models\Base::$ON_LINE_HTML[$item->on_line] !!}
                            </td>
                            <td>
                                @if ($item->on_line == 0)
                                    <a href="{{ route('game_list.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                @elseif($item->on_line == 1)
                                    <a href="{{ route('game_list.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                @endif
                                <a href="{{ route('game_list.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                <button class="btn btn-danger btn-xs"
                                        data-url="{{route('game_list.destroy', ['id' => $item->getKey()])}}"
                                        data-toggle="modal"
                                        data-target="#delete-modal"
                                >
                                    删除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['game_type' => $game_type, 'name' =>$name, 'client_type' => $client_type])->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个游戏吗?'])
@endsection