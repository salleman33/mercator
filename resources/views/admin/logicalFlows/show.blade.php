@extends('layouts.admin')
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('admin.logical-flows.index') }}">
        {{ trans('global.back_to_list') }}
    </a>

    <a class="btn btn-success" href="{{ route('admin.report.explore') }}?flow={{$logicalFlow->id}}">
        {{ trans('global.explore') }}
    </a>

    @can('lan_edit')
    <a class="btn btn-info" href="{{ route('admin.logical-flows.edit', $logicalFlow->id) }}">
        {{ trans('global.edit') }}
    </a>
    @endcan

    @can('lan_delete')
    <form action="{{ route('admin.logical-flows.destroy', $logicalFlow->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
    </form>
    @endcan
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.logicalFlow.title_singular') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th width='10%'>
                        {{ trans('cruds.logicalFlow.fields.name') }}
                    </th>
                    <td colspan='6'>
                        {{ $logicalFlow->name ?? "NONAME" }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.logicalFlow.fields.description') }}
                    </th>
                    <td colspan='6'>
                        {!! $logicalFlow->description !!}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.logicalFlow.fields.router') }}
                    </th>
                    <td>
                        @if ($logicalFlow->router_id !== null)
                        <a href="{{ route('admin.routers.show', $logicalFlow->router_id) }}">
                            {{ $logicalFlow->router->name }}
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th width='10%'>
                        {{ trans('cruds.logicalFlow.fields.priority') }}
                    </th>
                    <th width='20%'>
                        {{ trans('cruds.logicalFlow.fields.action') }}
                    </th>
                    <th width='10%'>
                        {{ trans('cruds.logicalFlow.fields.protocol') }}
                    </th>
                    <th width='20%'>
                        {{ trans('cruds.logicalFlow.fields.source_ip_range') }}
                    </th>
                    <th width='10%'>
                        {{ trans('cruds.logicalFlow.fields.source_port') }}
                    </th>
                    <th width='20%'>
                        {{ trans('cruds.logicalFlow.fields.dest_ip_range') }}
                    </th>
                    <th width='10%'>
                        {{ trans('cruds.logicalFlow.fields.dest_port') }}
                    </th>
                </tr>

                <tr>
                    <td>
                        {{ $logicalFlow->priority }}
                    </td>
                    <td>
                        {{ $logicalFlow->action }}
                    </td>
                    <td>
                        {{ $logicalFlow->protocol }}
                    </td>
                    <td>
                        {{ $logicalFlow->source_ip_range }}
                    </td>
                    <td>
                        {{ $logicalFlow->source_port ?? "ANY "}}
                    </td>
                    <td>
                        {{ $logicalFlow->dest_ip_range }}
                    </td>
                    <td>
                        {{ $logicalFlow->dest_port ?? "ANY" }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.logicalFlow.fields.users') }}
                    </th>
                    <td colspan='2'>
                        {{ $logicalFlow->users }}
                    </td>
                    <th>
                        {{ trans('cruds.logicalFlow.fields.schedule') }}
                    </th>
                    <td colspan='2'>
                        {{ $logicalFlow->schedule }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ trans('global.created_at') }} {{ $logicalFlow->created_at ? $logicalFlow->created_at->format(trans('global.timestamp')) : '' }} |
        {{ trans('global.updated_at') }} {{ $logicalFlow->updated_at ? $logicalFlow->updated_at->format(trans('global.timestamp')) : '' }}
    </div>
</div>

<a id="btn-cancel" class="btn btn-default" href="{{ route('admin.logical-flows.index') }}">
    {{ trans('global.back_to_list') }}
</a>

@endsection
