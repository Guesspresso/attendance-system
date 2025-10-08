
<section popover id="dept-attn" class="dept-attn">
    <h2>Department Attendance</h2>
    <ul>
      <li>
        <a href="javascript:activateTab( 'page1')" class="tab">Department 1</a>
      </li>
      <li>
        <a href="javascript:activateTab('page2')" class="tab">Department 2</a>
      </li>
      <li>
        <a href="javascript:activateTab( 'page3')" class="tab">Department 3</a>
      </li>
      <li>
        <a href="javascript:activateTab('page4')" class="tab">Department 4</a>
      </li>
    </ul>
    <div id="tabCtrl" class="tab-section">
        <div id="page1" style="display: block;">
            Page 1
        </div>
        <div id="page2" style="display: none;">
            Page 2
        </div>
        <div id="page3" style="display: none;">
            Page 3
        </div>
        <div id="page4" style="display: none;">
            Page 4
        </div>
    </div>
</section>

<style>
    section.dept-attn {
        position: fixed;
        min-height: 85vh;
        min-width: 85vw;
        margin: auto;
        padding: 2%;
        border-radius: 25px;
    }

    .dept-attn ul > li {
        display: inline-block;
        padding: 10px;
    }

    .tab-section {
        padding: 30px;
        margin: auto;
        width: 80vw;
        height: 100%;
    }

    .active {
        border: 1px solid lightblue;
    }
</style>

<script type="text/javascript">

    function activateTab( pageId) {
        var tabs = document.querySelectorAll('.tab'); // Adjust selector as needed

        var tabCtrl = document.getElementById('tabCtrl');
        var pageToActivate = document.getElementById(pageId);
        for (var i = 0; i < tabCtrl.childNodes.length; i++) {
            var node = tabCtrl.childNodes[i];
            if (node.nodeType == 1) { /* Element */
                node.style.display = (node == pageToActivate) ? 'block' : 'none';
            }
        }
    }

    </script>