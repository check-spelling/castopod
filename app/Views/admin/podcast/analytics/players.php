<?= $this->extend('admin/_layout') ?>

<?= $this->section('title') ?>
<?= $podcast->title ?>
<?= $this->endSection() ?>

<?= $this->section('pageTitle') ?>
<?= $podcast->title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="grid grid-cols-2 divide-x">
    <div class="mb-12 mr-6 text-center">
        <h2><?= lang('Charts.by_player_weekly') ?></h2>
        <div class="chart-pie" id="by-app-weekly-pie" data-chart-type="pie-chart" data-chart-url="<?= route_to(
            'analytics-data',
            $podcast->id,
            'PodcastByPlayer',
            'ByAppWeekly'
        ) ?>"></div>
    </div>

    
    <div class="mb-12 mr-6 text-center">
        <h2><?= lang('Charts.by_player_yearly') ?></h2>
        <div class="chart-pie" id="by-app-yearly-pie" data-chart-type="pie-chart" data-chart-url="<?= route_to(
            'analytics-data',
            $podcast->id,
            'PodcastByPlayer',
            'ByAppYearly'
        ) ?>"></div>
    </div>

    <div class="mb-12 mr-6 text-center">
        <h2><?= lang('Charts.by_device_weekly') ?></h2>
        <div class="chart-pie" id="by-device-weekly-pie" data-chart-type="pie-chart" data-chart-url="<?= route_to(
            'analytics-data',
            $podcast->id,
            'PodcastByPlayer',
            'ByDeviceWeekly'
        ) ?>"></div>
    </div>

    <div class="mb-12 mr-6 text-center">
        <h2><?= lang('Charts.by_os_weekly') ?></h2>
        <div class="chart-pie" id="by-os-yearly-pie" data-chart-type="pie-chart" data-chart-url="<?= route_to(
            'analytics-data',
            $podcast->id,
            'PodcastByPlayer',
            'ByOsWeekly'
        ) ?>"></div>
    </div>
</div>

<div class="mb-12 mr-6 text-center">
    <h2><?= lang('Charts.podcast_bots') ?></h2>
    <div class="chart-xy" id="bots-graph" data-chart-type="xy-chart" data-chart-url="<?= route_to(
        'analytics-data',
        $podcast->id,
        'PodcastByPlayer',
        'Bots'
    ) ?>"></div>
</div>

<script src="/assets/charts.js" type="module"></script>
<?= $this->endSection() ?>