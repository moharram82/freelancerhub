<?php $__env->startSection('freelancer-contents'); ?>
<div class="box">
    <h2>All Proposals</h2>

    <p>&nbsp;</p>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Delivery</th>
                <th>Cost</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/freelancers/proposal.php?proposal_id=1">Proposal Title</a></td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Proposal Title</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Proposal Title</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Proposal Title</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Test Project</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Test Project</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>

            <tr>
                <td>Test Project</td>
                <td>Mohammed Moharram</td>
                <td>3 weeks</td>
                <td>SDG 25,000</td>
            </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>