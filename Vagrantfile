Vagrant.configure(2) do |config|
  config.vm.box = "CentOS71"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = "glamourousparty.com"
  config.ssh.insert_key = false
  config.vm.synced_folder "./", "/var/www", nfs: true
  config.vm.provider "virtualbox" do |v|
    v.name = "womanshift"
    v.memory = "1024"
  end
  config.vm.provision "docker" do |d|
    d.build_image "/var/www", args: "-t womanshift"
    d.run "womanshift", args: "-d -p 80:80 womanshift"
  end
end
