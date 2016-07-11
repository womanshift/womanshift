<!DOCTYPE html>
<html>
    <head lang="ja">
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <body>
        <div id="hello"></div>
        <script type=“text/jsx">
            var HelloWorld = React.createClass({
                render: function() {
                    return (
                        {hallo_world.author}
                    );
                }
            });
            var HelloWorldBox = React.createClass({
                componentDidMount: function() {
                    this.loadAjax();
                }, 
                getInitialState: function() {
                    return {data: []};
                },
                loadAjax: function() {
                    $.ajax({
                        url: this.props.url,
                        dataType: 'jsonp',
                        success: function(data) {
                            this.setState({data: data.results.collection1});
                        }.bind(this),
                        error: function(xhr, status, err) {
                            console.error(this.props.url, status, err.toString());
                        }.bind(this)
                    });
                },
                render: function() {
                    return (
                        <HelloWorldList data={this.props.data} />
                    );
                }
            });
            var HelloWorldList = createClass({
                render: function() {
                    var helloWorldNodes = this.props.map(function(hallo_world) {
                        return (
                            <HelloWorld author={hallo_world.author}></HelloWorld>
                        )
                    });
                    return(
                        {helloWorldNodes}
                    );
                }
            });
            React.render(
                <HelloWorldBox url="http://192.168.33.12/test/list.json" />,
                document.getElementById('hello')
            )
        </script>
        <?php Asset::js(array('react-15.0.1.min.js', 'react-with-addons-15.0.1.min.js'), array(), 'js', false); ?>
    </body>
</html>
