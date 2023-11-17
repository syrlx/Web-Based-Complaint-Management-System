<x-layout>

    @include('partials._hero')

    <div class="container mx-auto">
        
        <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-black rounded-lg text-center">
            <h1 class="text-4xl font-bold uppercase text-black font-mono">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Welcome to</span>
                <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-red-500">Water Complaint System</span>
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8 mx-4">
            <div class="bg-gradient-to-r from-blue-400 to-purple-500 p-8 rounded-lg text-white">
                <h2 class="text-2xl font-bold text-center mb-4">Step-by-Step Guide</h2>
                <ol class="list-decimal text-lg leading-relaxed pl-6">
                    <li>Create an account by <a href="/register" class="text-white font-bold underline hover:text-gray-300 transition duration-300">registering</a> if you don't have one already.</li>
                    <li>If you already have an account, <a href="/login" class="text-white font-bold underline hover:text-gray-300 transition duration-300">log in</a> using your credentials.</li>
                    <li>Fill in the complaint form with relevant details about the issue you are facing.</li>
                    <li>Submit the complaint form to register your complaint.</li>
                    <li>To check the status of your past complaints, go to the "View Complaints" section.</li>
                    <li>View your complaints to see whether they are pending or already completed.</li>
                </ol>
            </div>

            <div class="bg-gradient-to-r from-green-400 to-blue-500 p-8 rounded-lg text-white">
                <h2 class="text-2xl font-bold text-center mb-4">Mission</h2>
                <p class="text-lg leading-relaxed">
                    Our mission is to ensure efficient and effective management of public complaints related to water supply, with a focus on prompt resolution, customer satisfaction, and continuous improvement. We aim to provide a reliable platform that enables citizens to report issues, facilitates seamless communication between stakeholders, and promotes transparency in addressing water supply concerns.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 mt-8 mx-4">
            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-8 rounded-lg text-white">
                <h2 class="text-2xl font-bold text-center mb-4">Vision</h2>
                <p class="text-lg leading-relaxed">
                    Our vision is to establish a robust and user-friendly water supply public complaint management system that enhances the overall quality and accessibility of water services. We strive to be the leading platform in the industry, recognized for our responsiveness, accountability, and commitment to customer-centric solutions. Through innovation and collaboration, we aim to contribute to the development of sustainable and resilient water infrastructure while fostering trust and confidence among the public.
                </p>
            </div>
        </div>

    </div>

</x-layout>
