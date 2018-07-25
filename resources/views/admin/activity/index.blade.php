@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">活动列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.activity.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">活动标题</th>
                         <th  style="width: 20%">活动开始时间</th>
                         <th  style="width: 20%">活动截止时间</th>
                         <th  style="width: 5%">排序</th>
                         <th style="width: 10%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->title }}
                             </td>
                             <td>
                                 {{ $item->start_at }}
                             </td>
                             <td>
                                 {{ $item->end_at }}
                             </td>
                             <td>
                                 {{ $item->sort }}
                             </td>
                             <td>
                                 {!! \App\Models\Base::$ON_LINE_HTML[$item->on_line] !!}
                             </td>
                             <td>
                                 @if ($item->on_line == 0)
                                     <a href="{{ route('activity.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->on_line == 1)
                                     <a href="{{ route('activity.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                 <a href="{{ route('activity.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="{{route('activity.destroy', ['id' => $item->getKey()])}}"
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
                     {!! $data->appends(['title' => $title, 'start_at' => $start_at, 'end_at' => $end_at])->links() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个活动吗?'])
@endsection