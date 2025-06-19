<section class="animate__animated animate__fadeIn">
    <!-- Page Title -->
    <p class="text-2xl font-bold text-center text-gray-800 mb-5">
        <span>Template Management</span>
    </p>

    <!-- Navigation Tabs -->
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 mb-5">
        <li class="me-2 cursor-pointer updater optioner !text-blue-600 active" name="basic_text_template" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Basic Text Template</p>
        </li>
        <li class="me-2 cursor-pointer viewer optioner" name="authentication_template" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Authentication Template</p>
        </li>
        <li class="me-2 cursor-pointer viewer optioner" name="utility_template" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Utility Template</p>
        </li>
        <li class="me-2 cursor-pointer viewer optioner" name="marketing_template_with_image" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Marketing Template with Image</p>
        </li>
        <li class="me-2 cursor-pointer viewer optioner" name="catalog_template" onclick="runoptioner(this)">
            <p class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Catalog Template</p>
        </li>
    </ul>

    <!-- Basic Text Template Form -->
    <form id="basic_text_template" class="space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Element Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="elementname" placeholder="Enter element name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="category">
                    <option value="MARKETING">MARKETING</option>
                    <option value="UTILITY">UTILITY</option>
                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Template Type</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="templatetype">
                    <option value="TEXT">TEXT</option>
                    <option value="IMAGE">IMAGE</option>
                    <option value="CATALOG">CATALOG</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Vertical</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="vertical" placeholder="Enter vertical">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="content" rows="4" placeholder="Enter content"></textarea>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Header</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="header" placeholder="Enter header">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Footer</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="footer" placeholder="Enter footer">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Example</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="example" placeholder="Enter example">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </div>
    </form>

    <!-- Authentication Template Form -->
    <form id="authentication_template" class="hidden space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Element Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="elementname" placeholder="Enter element name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="category">
                    <option value="MARKETING">MARKETING</option>
                    <option value="UTILITY">UTILITY</option>
                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Template Type</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="templatetype">
                    <option value="TEXT">TEXT</option>
                    <option value="IMAGE">IMAGE</option>
                    <option value="CATALOG">CATALOG</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Vertical</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="vertical" placeholder="Enter vertical">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="content" rows="4" placeholder="Enter content"></textarea>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Example</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="example" placeholder="Enter example">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Add Security Recommendation</label>
                <input type="checkbox" class="mt-2 p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="addSecurityRecommendation">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Code Expiration (Minutes)</label>
                <input type="number" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="codeExpirationMinutes" placeholder="Enter expiration time">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Message Send TTL (Seconds)</label>
                <input type="number" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="message_send_ttl_seconds" placeholder="Enter TTL in seconds">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">OTP Type</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="otp_type" placeholder="Enter OTP type">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Autofill Text</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="autofill_text" placeholder="Enter autofill text">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Package Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="package_name" placeholder="Enter package name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Signature Hash</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="signature_hash" placeholder="Enter signature hash">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </div>
    </form>

    <!-- Utility Template Form -->
    <form id="utility_template" class="hidden space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Element Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="elementname" placeholder="Enter element name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="category">
                    <option value="MARKETING">MARKETING</option>
                    <option value="UTILITY">UTILITY</option>
                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Template Type</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="templatetype">
                    <option value="TEXT">TEXT</option>
                    <option value="IMAGE">IMAGE</option>
                    <option value="CATALOG">CATALOG</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Vertical</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="vertical" placeholder="Enter vertical">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="content" rows="4" placeholder="Enter content"></textarea>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Header</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="header" placeholder="Enter header">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Footer</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="footer" placeholder="Enter footer">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Example</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="example" placeholder="Enter example">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Message Send TTL (Seconds)</label>
                <input type="number" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="message_send_ttl_seconds" placeholder="Enter TTL in seconds">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </div>
    </form>

    <!-- Marketing Template with Image Form -->
    <form id="marketing_template_with_image" class="hidden space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Element Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="elementname" placeholder="Enter element name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="category">
                    <option value="MARKETING">MARKETING</option>
                    <option value="UTILITY">UTILITY</option>
                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Template Type</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="templatetype">
                    <option value="TEXT">TEXT</option>
                    <option value="IMAGE">IMAGE</option>
                    <option value="CATALOG">CATALOG</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Vertical</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="vertical" placeholder="Enter vertical">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="content" rows="4" placeholder="Enter content"></textarea>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Header</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="header" placeholder="Enter header">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Footer</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="footer" placeholder="Enter footer">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Example</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="example" placeholder="Enter example">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Message Send TTL (Seconds)</label>
                <input type="number" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="message_send_ttl_seconds" placeholder="Enter TTL in seconds">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </div>
    </form>

    <!-- Catalog Template Form -->
    <form id="catalog_template" class="hidden space-y-6 bg-white/90 p-8 rounded-2xl shadow-xl max-w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Element Name</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="elementname" placeholder="Enter element name">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="category">
                    <option value="MARKETING">MARKETING</option>
                    <option value="UTILITY">UTILITY</option>
                    <option value="AUTHENTICATION">AUTHENTICATION</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Template Type</label>
                <select class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" name="templatetype">
                    <option value="TEXT">TEXT</option>
                    <option value="IMAGE">IMAGE</option>
                    <option value="CATALOG">CATALOG</option>
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Vertical</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="vertical" placeholder="Enter vertical">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="content" rows="4" placeholder="Enter content"></textarea>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Example</label>
                <input type="text" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="example" placeholder="Enter example">
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700">Message Send TTL (Seconds)</label>
                <input type="number" class="mt-2 p-4 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm placeholder-gray-500" name="message_send_ttl_seconds" placeholder="Enter TTL in seconds">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-lg mt-5 transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </div>
    </form>
</section>
