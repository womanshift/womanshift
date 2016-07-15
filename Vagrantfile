Vagrant.configure(2) do |config|
  config.vm.box = "Ubuntu14"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = "glamourousparty.com"
  config.vm.network :forwarded_port, host: 8080, guest: 80
  config.ssh.insert_key = false
  config.vm.synced_folder "./", "/vagrant", nfs: true
  config.vm.provider "virtualbox" do |v|
    v.name = "womanshift"
    v.memory = "1024"
  end
  config.vm.provision "docker" do |d|
    d.build_image "/vagrant", args: "-t womanshift/image"
    d.run "womanshift/image", args: "-d -p 8080:80"
  end
end
